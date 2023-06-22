from math import *
import mysql.connector
import time

# Création des dictionnaires pour stocker les amplitudes
ampli_micro1 = {}
ampli_micro2 = {}
ampli_micro3 = {}

# Choisissez combien de chiffres après la virgule vous souhaitez conserver
num_decimal_places = 15

# Constante pour le coefficient 
const = 8.854187*10**-12

# Calcul des amplitudes pour le micro 1
for i in range (16):
    for j in range (16):
        a=(i*0.5)**2
        b=(j*0.5)**2
        dist=sqrt(a+b)
        if dist != 0 :
            ampli=const/(dist**2)
        else :
            ampli = 0.0
        # Conversion de l'amplitude en entier long en déplaçant la virgule décimale
        ampli_long = int(ampli * (10 ** num_decimal_places))
        # Stockage de l'amplitude en format binaire dans le dictionnaire
        ampli_micro1[(i, j)] = format(ampli_long, 'b')


# Calcul des amplitudes pour le micro 2
for i in range (16):
    for j in range (16):
        y= abs(j-15)
        a=(i*0.5)**2
        b=(y*0.5)**2
        dist=sqrt(a+b)
        if dist != 0 :
            ampli=const/(dist**2)
        else :
            ampli = 0.0
        # Conversion de l'amplitude en entier long en déplaçant la virgule décimale
        ampli_long = int(ampli * (10 ** num_decimal_places))
        # Stockage de l'amplitude en format binaire dans le dictionnaire
        ampli_micro2[(i, j)] = format(ampli_long, 'b')


# Calcul des amplitudes pour le micro 3
for i in range (16):
    for j in range (16):
        x= abs(i-15)
        y= abs(j-15)
        a=(x*0.5)**2
        b=(y*0.5)**2
        dist=sqrt(a+b)
        if dist != 0 :
            ampli=const/(dist**2)
        else :
            ampli = 0.0
        # Conversion de l'amplitude en entier long en déplaçant la virgule décimale
        ampli_long = int(ampli * (10 ** num_decimal_places))
        # Stockage de l'amplitude en format binaire dans le dictionnaire
        ampli_micro3[(i, j)] = format(ampli_long, 'b')

# Établir une connexion à la base de données
conn = mysql.connector.connect(
    host="lhcp3349.webapps.net",
    user="iv5g2mc0_adminsae24",
    password="Motdepasse24!",
    database="iv5g2mc0_sae24"
)
cursor = conn.cursor()
# Fonction pour calculer et insérer la case correspondante dans la table "resultat"
def calculate_and_insert_case(amplitude_id):
    # Exécuter la requête SQL pour récupérer les amplitudes
    amplitude1_query = "SELECT valeur_c1 FROM mesures WHERE id = %s"
    amplitude2_query = "SELECT valeur_c2 FROM mesures WHERE id = %s"
    amplitude3_query = "SELECT valeur_c3 FROM mesures WHERE id = %s"

    cursor.execute(amplitude1_query, (amplitude_id,))
    amplitude1_bin = cursor.fetchone()[0]

    cursor.execute(amplitude2_query, (amplitude_id,))
    amplitude2_bin = cursor.fetchone()[0]

    cursor.execute(amplitude3_query, (amplitude_id,))
    amplitude3_bin = cursor.fetchone()[0]

    # Dictionnaires pour stocker les cases correspondant à chaque amplitude
    cases1 = []
    cases2 = []
    cases3 = []

    # Vérification des amplitudes pour chaque microphone
    for case, ampli_bin in ampli_micro1.items():
        if ampli_bin == amplitude1_bin:
            cases1.append(list(case))

    for case, ampli_bin in ampli_micro2.items():
        if ampli_bin == amplitude2_bin:
            cases2.append(list(case))

    for case, ampli_bin in ampli_micro3.items():
        if ampli_bin == amplitude3_bin:
            cases3.append(list(case))

    # Recherche d'une valeur commune aux trois listes de cases
    common_case = None
    for case1 in cases1:
        if case1 in cases2 and case1 in cases3:
            common_case = case1
            break

    # Enregistrer la case commune dans la table "resultat"
    if common_case:
        x = common_case[0] 
        y = common_case[1] 
        common_case_str = f"{x}.{y}"
        insert_query = "INSERT INTO resultat (id, case_value) VALUES (%s, %s)"
        cursor.execute(insert_query, (amplitude_id, common_case_str))
        conn.commit()
        print("La case où se situe l'objet pour l'amplitude_id", amplitude_id, "est :", common_case_str)
    else:
        print("Aucune case commune trouvée pour l'amplitude_id", amplitude_id)

# Boucle infinie pour exécuter le script en continu
while True:
    # Exécuter la requête SQL pour récupérer les amplitudes à traiter
    fetch_query = "SELECT id FROM mesures WHERE processed = 0 LIMIT 3"
    cursor.execute(fetch_query)
    amplitude_ids = [row[0] for row in cursor.fetchall()]

    # Traiter les amplitudes récupérées
    for amplitude_id in amplitude_ids:
        # Pause de 5 secondes entre chaque exécution
        time.sleep(2)
        # Calculer et insérer la case correspondante dans la table "resultat"
        calculate_and_insert_case(amplitude_id)

        # Marquer l'amplitude comme traitée en mettant à jour la colonne "processed" dans la table "mesures"
        update_query = "UPDATE mesures SET processed = 1 WHERE id = %s"
        cursor.execute(update_query, (amplitude_id,))
        conn.commit()



# Fermer la connexion à la base de données
cursor.close()
conn.close()

