from math import *
print ("----------------------------------------------------------------------------------------------------------Micro 1----------------------------------------------------------------------------------------------------------")
for i in range (16):
    for j in range (16):
        a=(i*0.5)**2
        b=(j*0.5)**2
        dist=sqrt(a+b)
        print ("Distance entre le micro 1 et la case (", i,",", j,"):",dist)
        if dist != 0 :
            ampli=1/(dist**2)
            print ("Amplitude du micro 1 pour la case (", i,",", j,"):",ampli)
        else :
            print ("Amplitude du micro 1 pour la case (", i,",", j,"): 0.0")




print ("----------------------------------------------------------------------------------------------------------Micro 2----------------------------------------------------------------------------------------------------------")
for i in range (16):
    for j in range (16):
        y= abs(j-15)
        a=(i*0.5)**2
        b=(y*0.5)**2
        dist=sqrt(a+b)
        print ("Distance entre le micro 2 et la case (", i,",", j,"):",dist)
        if dist != 0 :
            ampli=1/(dist**2)
            print ("Amplitude du micro 2 pour la case (", i,",", j,"):",ampli)
        else :
            print ("Amplitude du micro 2 pour la case (", i,",", j,"): 0.0")
            




print ("----------------------------------------------------------------------------------------------------------Micro 3----------------------------------------------------------------------------------------------------------")
for i in range (16):
    for j in range (16):
        x= abs(i-15)
        y= abs(j-15)
        a=(x*0.5)**2
        b=(y*0.5)**2
        dist=sqrt(a+b)
        print ("Distance entre le micro 3 et la case (", i,",", j,"):",dist)
        if dist != 0 :
            ampli=1/(dist**2)
            print ("Amplitude du micro 3 pour la case (", i,",", j,"):",ampli)
        else :
            print ("Amplitude du micro 3 pour la case (", i,",", j,"): 0.0")
            
