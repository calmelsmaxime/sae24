a1=$1
a2=$2
a3=$3

mosquitto_pub -h <adresse_broker> -p 1883 -u sae24g34 -P passroot -t E102\amplisim -m "{\"ampli1\" : $a1 , \"ampli2\" : $a2 , \"ampli3\" : $a3}"
