#!/usr/bin/env python
# coding: utf-8

# In[107]:


import pandas as pd
import numpy as np
import os 
from sklearn.cluster import KMeans
from matplotlib import pyplot as plt 
from scipy.cluster.hierarchy import dendrogram, linkage, fcluster, ward
from matplotlib.pyplot import figure
class Phono:

    def __init__(self,name,*repertoire):   
        '''On utilise le nom du csv qui sera au format txt.  
         Bien penser à homogénéiser les donnée : 
                 - Pour l'instant il n'est pas important de nommer toute les colonnes , il faut juste que 
                  la colonne de retranscription phonétique s'appelle : "PHONO" et les prises de paroles soit nommées :
                  interlocuteur . Ce soucis sera résolu bientôt ( pas compliqué mais il faut mettre en forme les 
                  appels d'index etc .. ) 
                  
                  
                  - Pour extraire les données du texte : rentrer dans la création de l'objet le nom qui correspond , 
                   : instanciation = Phono('nom_données') . Penser à la casse !! 
                   
                   
                  - Si le repertoire courant ne contient pas les données à extraire, préciser dans l'instanciation 
                      le repertoire dans lequel on se situe : 
                              instanciation = Phono('nom_données','répertoire_où_données') ''' 
        self.name=name 
        if repertoire: #Changement de repertoire si le dossier courant ne contient pas les données
            os.chdir(repertoire[0])
        self.data1 = pd.read_csv("{}.txt".format(name), sep="\t")
        self.MOT = self.data1[self.data1.interlocuteur =="CHI"] 
        self.Phono = self.data1[self.data1.interlocuteur =="pho"]  
        self.tt =self.Phono["PHONO"] 
        self.Phono_list=self.tt  
    def create(self): 
         #On créer une liste contenant l'alphabet phonétique , par ordre décroissant de fréquence
        IPA = "a,r,l,e,s,i,ɛ,ə,t,k,p,d,m,ã,n,u,v,o,y,ɔ̃,ʒ,ɔ,ɛ̃,f,b,j,w,ɥ,z,ø,ʃ,œ̃,œ,g,ɑ,ɲ"
        IPA= IPA.split(',') 
        self.l=[]
        for i in IPA: 
            tmp=[] 
            for j in list(self.Phono_list):  
      #Je créer une matrice de verité, pour chaque prise de parole de l'enfant, j'évalue si un phonème est présent
     # ou pas dans sa prise de parole ; 1 = le phonème est présent , sinon 0 
                if i in j: 
                    tmp.append(1) 
                else : 
                    tmp.append(0) 
            self.l.append(tmp) 
    
        self.l=np.asarray(self.l)  # Mise en forme de la matrice de verité pour faire correspondre les lignes 
                                     # et les colonnes . Matrice de verité avant mise en forme : 36*225 
                                    # on veut du 225*36 ( pour mettre les phonèmes en index de colonne )
        lt=self.l.transpose()
#lt.shape
        self.MF = pd.DataFrame(lt,columns=IPA)  # Je créer la datframe avec la table de verité 
#Phono_list=Phono_list.to_frame()
        self.MF['simil']=list(self.Phono_list) 

    def distribution_all(self,mean=False ):
        ''' Ce module retourne la distribution des phonèmes dans chaque phrase des données retranscrite 
            distrubtion_all(self,mean=False) si mean=True , n'affiche que la proportion des phonèmes dans les phrases''' 
        self.create()
       
        self.info=self.MF.describe()
        self.distribution_all= self.info.loc[['mean','std']]
        if mean==False: 
            return self.distribution_all 
        else:
            return self.distribution_all.loc['mean'] 
        
    def distribution(self,phoneme,mean=False):  
        ''' Ce module retourne la distribution d'un phonèmes dans chaque phrase des données retranscrite 
            distrubtion_(self,phoneme, mean=False) si mean=True , n'affiche que la proportion du phonème
            dans les phrases , phoneme = le phonème dont on veut la distribution''' 
        return self.distribution_all(mean)[phoneme] 
            
    def save(self,*change,mean=False):  
        '''On enregistre la distribution des phonèmes dans chaque phrase sous format csv (séparateur= ;) 
            save(self,*change,mean=False) , si mean=True , n'affiche que la proportion du phonème dans les phrases, 
            phonème = le phonème dont on veut la distribution.
            Le csv est enregistré sous le nom : "nom_des_données_chargée + _pho" , si on veut enregistrer sous 
            un autre nom, utiliser dans le module : change='nouveau_nom_d'_enregistrement'   
        '''
        self.s=self.distribution_all(mean)
        if change: 
            self.s.to_csv('{}.csv'.format(change[0]),sep=';')   #Enregistrer avec un nom différent
        else: 
            self.s.to_csv('{}_pho.csv'.format(self.name))       #Enregistrer avec nom + _pho
            
    def kmean(self,k):
        self.distribution_all()
        self.MF
        self.test =self.MF.drop('simil', axis='columns')
        self.test =self.test.transpose()
        model=KMeans(n_clusters=k) 
        self.km=model.fit(self.test).labels_
        indexation_k=np.argsort(self.km)
        self.Class_k=pd.DataFrame(self.test.index[indexation_k],self.km[indexation_k])
        return self.Class_k
    
    def cah(self,tr,visualise= False ): #Création d'une méthode de classification ascendante hierarchique
       # si visualise = True, affiche le dendogramme correspondan
      # la variable tr est l'embrachement ou on effectue le classement dans la classification 
       # ( faire test avec visualise = True pour estimer le bon embrachement à considérer )
        self.create()
        self.MF
        self.test =self.MF.drop('simil', axis='columns')
        self.test =self.test.transpose()
       #générer la matrice des liens
        Z = linkage(self.test,method='ward',metric='euclidean')
        if visualise==True :
            plt.figure(num=None, figsize=(8, 6), dpi=80, facecolor='w', edgecolor='k')
            plt.title("CAH : {}".format(self.name))
            dendrogram(Z,labels=self.test.index,orientation='left',color_threshold=tr) 
            plt.show()
        else : 
            self.groupes_phoneme= fcluster(Z,t=tr,criterion='distance')
            indexation=np.argsort(self.groupes_phoneme ) 
            self.Class_cah=pd.DataFrame(self.test.index[indexation],self.groupes_phoneme[indexation])
            return self.Class_cah


