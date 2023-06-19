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
amplitude1_bin = "110111010"
amplitude2_bin = "1000100000"
amplitude3_bin = "11010000"

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

# Affichage du résultat
if common_case:
    print("La case où se situe l'objet est :", common_case)
else:
    print("Aucune case commune trouvée pour les trois amplitudes")

