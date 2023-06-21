a1=$1
a2=$2
a3=$3


mosquitto_pub -h 192.168.1.15 -u g34 -t amplitude -m "{\"ampli1\" : $a1 , \"ampli2\" : $a2 , \"ampli3\" : $a3}"

