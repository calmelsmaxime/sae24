from math import *

amplitude1 = 0.017777777777777778
amplitude2 = 0.008888888888888887
amplitude3 = 0.017777777777777778
case1 = {'a':[], 'b':[],'c':[], 'd':[]}
case2 = {'a':[], 'b':[],'c':[], 'd':[]}
case3 = {'a':[], 'b':[],'c':[], 'd':[]}
compteur1 = 0
compteur2 = 0
compteur3 = 0

print ("----------------------------------------------------------------------------------------------------------Micro 1----------------------------------------------------------------------------------------------------------")
for i in range (16):
    for j in range (16):
        a=(i*0.5)**2
        b=(j*0.5)**2
        dist=sqrt(a+b)
        if dist != 0 :
            ampli=1/(dist**2)
        else :
            ampli = 0
        if ampli==amplitude1 :
            compteur1+=1
            if compteur1 ==1:
                case1['a'].append(i)
                case1['a'].append(j)
            elif compteur1 ==2:
                case1['b'].append(i)
                case1['b'].append(j)
            elif compteur1 ==3:
                case1['c'].append(i)
                case1['c'].append(j)
            elif compteur1 ==4:
                case1['d'].append(i)
                case1['d'].append(j)
            else:
                print ("Trop de cases correspondant à la même amplitude")
print (case1)




print ("----------------------------------------------------------------------------------------------------------Micro 2----------------------------------------------------------------------------------------------------------")
for i in range (16):
    for j in range (16):
        y= abs(j-15)
        a=(i*0.5)**2
        b=(y*0.5)**2
        dist=sqrt(a+b)
        if dist != 0 :
            ampli=1/(dist**2)
        else :
            ampli = 0
        if ampli==amplitude2 :
            compteur2+=1
            if compteur2 ==1:
                case2['a'].append(i)
                case2['a'].append(j)
            elif compteur2 ==2:
                case2['b'].append(i)
                case2['b'].append(j)
            elif compteur2 ==3:
                case2['c'].append(i)
                case2['c'].append(j)
            elif compteur2 ==4:
                case2['d'].append(i)
                case2['d'].append(j)
            else:
                print ("Trop de cases correspondant à la même amplitude")
print (case2)
       




print ("----------------------------------------------------------------------------------------------------------Micro 3----------------------------------------------------------------------------------------------------------")
for i in range (16):
    for j in range (16):
        x= abs(i-15)
        y= abs(j-15)
        a=(x*0.5)**2
        b=(y*0.5)**2
        dist=sqrt(a+b)
        if dist != 0 :
            ampli=1/(dist**2)
        else :
            ampli = 0
        if ampli==amplitude3 :
            compteur3+=1
            if compteur3 ==1:
                case3['a'].append(i)
                case3['a'].append(j)
            elif compteur3 ==2:
                case3['b'].append(i)
                case3['b'].append(j)
            elif compteur3 ==3:
                case3['c'].append(i)
                case3['c'].append(j)
            elif compteur3 ==4:
                case3['d'].append(i)
                case3['d'].append(j)
            else:
                print ("Trop de cases correspondant à la même amplitude")
print (case3)

for clee1 in case1:
    for clee2 in case2:
        for clee3 in case3:
            if case1[clee1]==case2[clee2]==case3[clee3] and case1[clee1]!= [] :
                resultat=case1[clee1]
                print ("La case où se situe l'objet est:",case1[clee1])
