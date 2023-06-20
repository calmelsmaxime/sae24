from math import *
from time import sleep
import random
import subprocess

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



last_x = None
last_y = None
last_positions = []

def deplacement(x, y):
    global last_x, last_y
    
    if last_x is not None and last_y is not None:
        x = last_x
        y = last_y
    
    global last_positions
    if len(last_positions) >= 4:
        last_positions.pop(0)
    
    last_positions.append((x, y))
    
    valid_positions = []
    
    while len(valid_positions) == 0:
        if 0 < x < 15:
            nx = random.choice([-1, 0, 1])
            x_new = x + nx
        elif x == 0:
            nx = random.choice([0, 1])
            x_new = x + nx
        elif x == 15:
            nx = random.choice([-1, 0])
            x_new = x + nx

        if 0 < y < 15:
            ny = random.choice([-1, 0, 1])
            y_new = y + ny
        elif y == 0:
            ny = random.choice([0, 1])
            y_new = y + ny
        elif y == 15:
            ny = random.choice([-1, 0])
            y_new = y + ny

        if (x_new, y_new) not in last_positions:
            valid_positions.append((x_new, y_new))
    
    new_x, new_y = random.choice(valid_positions)

    # Récupération des amplitudes pour la case actuelle
    amplisim1 = ampli_micro1[(new_x, new_y)]
    amplisim2 = ampli_micro2[(new_x, new_y)]
    amplisim3 = ampli_micro3[(new_x, new_y)]

    return (new_x, new_y, amplisim1, amplisim2, amplisim3)


x = random.randint(0, 15)
y = random.randint(0, 15)

amplisim1 = ampli_micro1[(x, y)]
amplisim2 = ampli_micro2[(x, y)]
amplisim3 = ampli_micro3[(x, y)]

print(x, y)
print(amplisim1)
print(amplisim2)
print(amplisim3)

while True:
    sleep(5)
    tab = deplacement(x, y)
    x, y, amplisim1, amplisim2, amplisim3 = tab

    print(x, y)
    print(amplisim1)
    print(amplisim2)
    print(amplisim3)
    subprocess.call(["bash", "mqtt_pub.sh", amplisim1, amplisim2, amplisim3])
