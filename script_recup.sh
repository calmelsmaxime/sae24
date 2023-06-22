#!/bin/bash

# Informations de connexion à la base de données MySQL
host=lhcp3349.webapps.net
user=iv5g2mc0_adminsae24
password=Motdepasse24!
port=3306
database=iv5g2mc0_sae24

# Callback exécutée lors de la réception d'un message MQTT
on_message() {
    echo "Message reçu sur le topic $1:"
    payload="$2"

    # Extraction des champs requis
    ampli1=$(echo "$payload" | jq -r '.ampli1')
    ampli2=$(echo "$payload" | jq -r '.ampli2')
    ampli3=$(echo "$payload" | jq -r '.ampli3')
    case_valeur=$(echo "$payload" | jq -r '.case')

    # Récupération de l'heure et la date actuelles
    horaire=$(date +"%H:%M:%S")
    date=$(date +"%d/%m/%Y")

    # Insertion des données dans la base de données
    query="INSERT INTO MESURES (date, heure, valeur_c1, valeur_c2, valeur_c3, case_val) VALUES ('$date', '$horaire', '$ampli1', '$ampli2', '$ampli3', '$case_valeur')"
    mysql -h "$host" -u "$user" -p"$password" -P "$port" -D "$database" -e "$query"
}

# Connexion au broker MQTT et configuration des callbacks
mosquitto_sub -h 192.168.102.136 -u g34 -t "amplitude" -v | while read -r line; do
    topic=$(echo "$line" | awk '{print $1}')
    message=$(echo "$line" | cut -d' ' -f2-)
    on_message "$topic" "$message"
done
