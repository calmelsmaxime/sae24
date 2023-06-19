from math import *
import random

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


x = random.randint(0, 15)
y = random.randint(0, 15)

print(x , y)

def deplacement(x, y):
    if 0 < x < 15 : 
        nx = random.randint(-1, 1)
        x += nx
    elif x == 0 :
        nx = random.randint(0, 1)
        x += nx
    elif x == 15 :
        nx = random.randint(-1, 0)
        x += nx

    print(x)

    if 0 < y <15 : 
        ny = random.randint(-1, 1)
        y += ny
    elif y == 0 :
            ny = random.randint(0, 1)
            y += ny
    elif y == 15 :
        ny = random.randint(-1, 0)
        y += ny
    print(y)

    return (x, y)

tab = deplacement(x, y)
print(tab)
x, y = tab
print(x, y)

for case, ampli_bin in ampli_micro1.items():
    if case == tab:
        amplisim1 = ampli_bin
        break

for case, ampli_bin in ampli_micro2.items():
    if case == tab:
        amplisim2 = ampli_bin
        break

for case, ampli_bin in ampli_micro3.items():
    if case == tab:
        amplisim3 = ampli_bin
        break

print (amplisim1)
print (amplisim2)
print (amplisim3)
