<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>TER :multistream</title>

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--barre latéral debut-->
        <aside>
          <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <h4 class="centered">TER</h4>
            <p class="centered">AQUISITION LANGUAGE CHEZ L'ENFANT</p>
            <ul class="sidebar-menu" id="nav-accordion">
              <li class="mt">
                <a href="../index.html">
                  <i class="fa fa-home"></i>
                  <span>Acceuil</span>
                  </a>
              </li>
              <!-- menu deroulant enfant -->
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-child"></i>
                  <span>Enfants</span>
                  </a>
                  <ul class="sub">
                    <li><a href="adrien.html">Adrien</a></li>
                    <li><a href="anae.html">Anaé</a></li>
                    <li><a href="antoine.html">Antoine</a></li>
                    <li><a href="julie.html">Julie</a></li>
                    <li><a href="madeleine.html">Madeleine</a></li>
                    <li><a href="theophile.html">Théophile</a></li>

                  </ul>
              </li>
              <!-- /menu deroulant enfant -->
              <!-- menu deroulant etude -->
              <li class="sub-menu">
                <a href="javascript:;"> <!-- permet de faire le menu deroulant -->
                  <i class="fa fa-dashboard"></i>
                  <span>Etudes rélisées</span>
                  </a>
                  <ul class="sub">
                    <li><a href="decouverte_donne.html">Découverte des données</a></li>
                    <li><a href="stackgraph.html">StackPlot</a></li>
                    <li><a href="multistream.php">Multistream</a></li>
                    <li><a href="distance_dl.html">Distance de DL</a></li>
                    <li><a href="pattern_mining.html">Pattern mining</a></li>
                    <li><a href="modele_LSTM.html">Modèle LSTM</a></li>
                    <li><a href="modele_articulatoire.html">Modèle articulatoire</a></li>
                  </ul>
              </li>
              <!-- /menu deroulant etude -->
              <!-- panel données -->
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-th"></i>
                  <span>Sources</span>
                  </a>
                  <ul class="sub">
                    <li><a href="donnee_brute.html">Données corpus colaje</a></li>
                    <li><a href="basic_table.html">Données retraivaillées</a></li>
                    <li><a href="article.html">Articles et liens</a></li>
                  </ul>
              </li>
              <!-- fin panel données -->
              <!-- /menu deroulant etude -->
            </ul>
            <!-- sidebar menu end-->
          </div>
        </aside>
        <!--barre latéral fin-->
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
          <h2 class="title1"
              align="center">MultiStream: </h2>
          <h4 align="center">Une approche multirésolution de type "Streamgraph"
          pour explorer les séries chronologiques hiérarchiques</h4>
          <div class="row mt">
              <div class="col-lg-12">
                <div class="content-panel">
                  <div class="panel-body">
                    <div class="col-md-6">
                        <p align="justify">
                          Les séries chronologiques multiples sont un ensemble de variables quantitatives multiples
                          se produisant au même intervalle. Ils sont présents dans de nombreux domaines
                          tels que la médecine, la finance et la fabrication pour les
                          des fins. Ces dernières années, <i> <a
                            href="http://leebyron.com/streamgraph/" target="_blank">
                              Streamgraph</a></i> la visualisation (issue de ThemeRiver) a
                          a été largement utilisé pour représenter les modèles d'évolution temporelle dans
                          de multiples séries chronologiques. Cependant, le Streamgraph ainsi que le ThemeRiver
                          souffrent de problèmes d'extensibilité lorsqu'elles sont traitées à plusieurs reprises
                          série. Pour résoudre ce problème, plusieurs séries temporelles peuvent être
                          organisée en une structure hiérarchique où le temps individuel
                          Les séries sont regroupées hiérarchiquement en fonction de leur proximité. Dans
                          Dans ce document, nous présentons une nouvelle approche basée sur le Streamgraph pour
                          la structure hiérarchique de séries chronologiques multiples pour faciliter
                          l'exploration et les comparaisons de l'évolution temporelle. Sur la base d'une
                          technique focus+contexte, notre méthode permet l'exploration de séries chronologiques
                          à différentes granularités(<i>e.g.</i> pour plus de détails).
                        </p>
                        <p>
                          <a
                            href="https://www.lirmm.fr/~cuenca/publications/tvcg/cuenca_et_al_2018.pdf"
                            target="_blank">PDF</a> | <a href="https://youtu.be/T-Nrwif7dss"
                            target="_blank">Video</a> | <a
                            href="http://www.lirmm.fr/~cuenca/publications/tvcg/MultiStream_VIS_2018.pdf"
                            target="_blank">Slides (presented at IEEE VIS 2018)</a>
                        </p>
                        <p align="justify" style="font-size: 12px;">
                          E. Cuenca, A. Sallaberry, F. Y. Wang, and P. Poncelet. MultiStream:
                          A Multiresolution Streamgraph Approach to Explore Hierarchical Time
                          Series. <i>IEEE Transactions on Visualization and Computer Graphics</i>,
                          24(12):3160-3173, 2018.
                        </p>
                      </div>
                      <div class="col-xs-6">
                          <iframe class="text-center" width="100%" height="270"
                          src="http://www.youtube.com/embed/T-Nrwif7dss?rel=0"
                          frameborder="0" webkitallowfullscreen mozallowfullscreen
                          allowfullscreen></iframe>
                      </div>
                        <br>
                      </div>
                      <p align="center">
                        Contact: <a>erick.cuenca[at]lirmm.fr</a>
                        <a href="https://github.com/erickedu85/" target="_blank">
                          <span
                          class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x"></i> <i
                            class="fa fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </p>
                    </div>
                  </div>
                </div>
                </div>
                <!-- /panel -->
              </div>
            </div>
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="content-panel">
                    <div class="panel-body">
                      <h4 class="centered"> Pour une raison de confidentialité les résultats de multestream ne sont pas accessibles pour le moment. <br>
                      Merci de votre compréhesion.</h4>
                    </div>
                  </div>
                </div>
              <!-- /panel -->
            </div>
          <br>
          <br>
            <h3 align="center">Resultat pas enfant : </h3><br>
          <div class="row mt">
            <form action="visualisation.php" method="post">
              <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="dmbox">
                    <div class="service-icon">
                          <a href="visualisation_adrien.php"><img class="img-circle" width="100" height="100"
                             src="photo/adrien.png"></a>
                        </div>
                        <br></br>
                        <button class="btn btn-round btn-default" type="submit" name='dataset' value="bouton4">Adrien</button>
                  </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="dmbox">
                  <div class="service-icon">
                    <a href="faq.html#"><img class="img-circle" width="100" height="100"
                       src="photo/anae.png"></a>
                  </div>
                  <br></br>
                  <button class="btn btn-round btn-default" type="submit" name='dataset' value="bouton5">Anaé</button>
                </div>
              </div>
              <!-- end dmbox -->
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="dmbox">
                  <div class="service-icon">
                    <a href="faq.html#"><img class="img-circle" width="100" height="100"
                       src="photo/antoine.jpg"></a>
                  </div>
                  <br></br>
                  <button class="btn btn-round btn-default" type="submit" name='dataset' value="bouton6">Antoine</button>
              </div>
          </div>
        </div>
      </form>
          <div class="row mt">
            <form action="visualisation.php" method="post">
              <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="dmbox">
                    <div class="service-icon">
                          <img class="img-circle" width="100" height="100"
                             src="photo/julie.jpg">
                      </div>
                      <br></br>
                      <button class="btn btn-round btn-default" type="submit" name='dataset' value="bouton1">Julie</button>
                  </div>
                </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="dmbox">
                  <div class="service-icon">
                   <img class="img-circle" width="100" height="100"
                       src="photo/madeleine.jpg">
                  </div>
                  <br></br>
                  <button class="btn btn-round btn-default" type="submit" name='dataset' value="bouton2">Madeleine</button>
                </div>
              </div>
              <!-- end dmbox -->
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="dmbox">
                  <div class="service-icon">
                    <a href="faq.html#"><img class="img-circle" width="100" height="100"
                       src="photo/theophile.jpg"></a>
                  </div>
                  <br></br>
                  <button class="btn btn-round btn-default" type="submit" name='dataset' value="bouton3">Théophile</button>
              </div>
          </div>
        </div>
      </form>
          </section>
          <!-- /wrapper -->
      </section>
    <!-- /MAIN CONTENT -->
    <!--footer start-->
    <footer class="site-footer">
      <div class="footer-text">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>

          <p>
            <a href= "" > BOBO Florian - </a>
            <a href= "" > CISTERNE Clément- </a>
            <a href= "" > PLA-COMES Marine - </a>
            <a href= "" > RANDRIANJANAHARY Sariaka</a>
          </p>
        </div>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--c'est pour les diagrammes/menu deroulan-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--scipt pour cette page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>

</body>

</html>
