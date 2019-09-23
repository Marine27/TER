Module_algophone V1.0 
__________________________________________________
__________________________________________________

Pour importer module depuis le fichier courant : 

	>> from module_algophone import Phono 
Pour avoir un peu d'aide sur l'utilisation de l'algorithme : 
	>> help (Phono) 

-------------------------------------------------
------------------------------------------------- 

 Pour importer module depuis un fichier en n'étant pas dans le fichier ou est localisé le module : 
 
	>> import os 
	>> os.getcwd() 
	# Pour voir si on ne serait pas par hasard au bon endroit... 
	>> os.chdir('chemin_répertoire_où_sont_les_données') 

------------------------------------------------
------------------------------------------------ 

Pour la mise en forme des données : 
Faire import du .cha sur le site 
Faire une conversion au format .txt depuis le site : 
	http://ct3.ortolang.fr/teiconvert/index-en.html 
Changer nom de colonnes : 
  première colonne devient : interlocuteur 
  dernière colonne devient : PHONO  

 [ Pour l'instant, l'algo est à mettre à jour pour faciliter importation de données ] 

------------------------------------------------
------------------------------------------------ 
 -Faire attention à la casse ( Majuscule/minuscule ) 
 - Ne pas hésiter à changer le code si pour vous des méthodes sont plus pythonesque  
 - Créer de nouveau module pour alimenter l'utilité de cette algorithmes ;) 
 - penser à documenter entre ''' ''' pour avoir des docstring et un résumé des fonctions par le bias de la fonction help('fonction ou classe à tester ') 
