from math import *

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

# Vos amplitudes en binaire
amplitude1_bin = "0"
amplitude2_bin = "10011101"
amplitude3_bin = "1001110"

# Dictionnaires pour stocker les cases correspondant à chaque amplitude
case1 = []
case2 = []
case3 = []

# Vérification des amplitudes pour chaque microphone
for case, ampli_bin in ampli_micro1.items():
    if ampli_bin == amplitude1_bin:
        case1 = list(case)
        break

for case, ampli_bin in ampli_micro2.items():
    if ampli_bin == amplitude2_bin:
        case2 = list(case)
        break

for case, ampli_bin in ampli_micro3.items():
    if ampli_bin == amplitude3_bin:
        case3 = list(case)
        break

# Vérification que les trois cases sont identiques
if case1 == case2 == case3:
    print("La case où se situe l'objet est :", case1)
else:
    print("Aucune case commune trouvée pour les trois amplitudes")

