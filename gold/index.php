<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gold</title>

    <!-- font awesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- main css link -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- animation css link -->
    <link rel="stylesheet" href="css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="css/media.css" />
  </head>
  <body>
    <div class="wrap">
     
      <?php include $_SERVER["DOCUMENT_ROOT"]. "/gold/include/header.php" ?> 
      
      <section class="contents arrivals">
        <div class="center clear">
          <!-- title with common style -->
          <div class="title">
            <h2>New Arrivals</h2>
            <div class="linkBox">
              <span class="line"></span>
              <a href="#"> View all products</a>
            </div>
          </div>
          <!-- end of common title -->

              <?php
                include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
                                           
              ?>

          <div class="arrivalBox">
            <div class="arrivalCon">
              <img src="img/new-arrival-1.jpg" alt="" />
              <span class="overlay"></span>
              <div class="arrivalTxt">
                <h2>Summer</h2>
                <em>collection</em>
              </div>
            </div>
            <div class="arrivalCon">
              <img src="img/new-arrival-2.jpg" alt="" />
              <span class="overlay"></span>
              <div class="best">
                <a href="#">best</a>
                <p>Quality</p>
              </div>
            </div>
            <div class="arrivalCon">
              <img src="img/new-arrival-3.jpg" alt="" />
              <span class="overlay"></span>
              <div class="arrivalTxt">
                <h2>Autumn</h2>
                <em>collection</em>
              </div>
            </div>
          </div>
          <!-- end of arrival Contents -->
        </div>
      </section>
      <section class="contents product">
        <div class="center clear">
          <!-- title with common style -->
          <div class="title">
            <h2>Desgin Project</h2>
            <div class="linkBox">
              <span class="line"></span>
              <a href="#"> View all products</a>
            </div>
          </div>
          <!-- end of common title -->


          <div class="productBox clear">
            <div class="boxLeft">


              <!-- design image db connect  -->
              <?php                
                $sql="select * from gold_de order by gold_de_num desc limit 4";
                $result_design=mysqli_query($dbConn, $sql);

                while($row_result=mysqli_fetch_array($result_design)){
                  $design_thumb=$row_result['gold_de_thumb'];
             
              ?>

              <div class="productImg">
                <img src="/gold/data/design_page/thumb/<?=$design_thumb?>" alt="" />
                <span class="outline"><i class="fa fa-search"></i></span>
              </div>

              <?php
                }             
              
              ?>
            
            </div>
            <!-- end of box left -->
            <div class="boxRight">

              <?php
                 $sql="select * from gold_de order by gold_de_num desc limit 4";
                 $result_design=mysqli_query($dbConn, $sql);

                 while($row_result=mysqli_fetch_array($result_design)){
                   $design_num=$row_result['gold_de_num'];
                   $design_tit=$row_result['gold_de_tit'];
                   $design_des=$row_result['gold_de_des'];
              ?>


              <div class="productTxt">
                <div>
                  <h2><?=$design_tit?></h2>
                  <p class="abc"><?=$design_des?></p>
                  <a href="/gold/pages/design/design_detail.php?num=<?=$design_num?>">view more</a>
                </div>
              </div>              
              <!-- end of product Txt panel -->

              <?php
                }             
              
              ?>
            
            </div>
            <!-- end of box right -->
          </div>
          <!-- end of product box -->
        </div>
      </section>
      <!-- end of product section -->
      <section class="contents ours">
        <div class="center clear">
          <!-- title with common style -->
          <div class="title">
            <h2>web & app preview</h2>
            <div class="linkBox">
              <span class="line"></span>
              <a href="#"> View all products</a>
            </div>
          </div>
          <!-- end of common title -->

          <div class="fashionBox men">
            <div class="fashionTxt">
              <h2><em>Web</em> project</h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium.
              </p>
              <a href="/gold/pages/web/web.php">view more</a>
            </div>

            <?php
                include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
                $sql="select * from gold_web order by gold_web_num desc limit 3";

                $web_result=mysqli_query($dbConn,$sql);

                while($web_row=mysqli_fetch_array($web_result)){
                  $web_num=$web_row['gold_web_num'];
                  $web_thumb=$web_row['gold_web_thumb'];
                  $web_title=$web_row['gold_web_tit'];
                  $web_desc=$web_row['gold_web_des'];  
                  // $web_domain=$web_row['gold_web_dom'];                         
            
            ?>
            <div class="fashionImg">
              <div>
                <img src="/gold/data/web_page/thumb/<?=$web_thumb?>" alt="" />
                <h2><?=$web_title?></h2>
                <em class="cutTxt"><?=$web_desc?></em>
                <a href="/gold/pages/web/web_detail.php?num=<?=$web_num?>">View Details</a>
              </div>
            </div>
            <!-- looped box -->

            <?php
                }
         
            ?>



          </div>  
          <!-- end of men fashion -->
          <div class="fashionBox women">
            <div class="fashionTxt">
              <h2><em>app</em> project</h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium.
              </p>
              <a href="#">view more</a>
            </div>
            <div class="fashionImg">
              <div>
                <img src="img/product-type-1.jpg" alt="" />
              </div>
            </div>
            <div class="fashionImg">
              <div>
                <img src="img/women-2.jpg" alt="" />
              </div>
            </div>
            <div class="fashionImg">
              <div>
                <img src="img/product-type-2.jpg" alt="" />
              </div>
            </div>
          </div>

          <!-- end of women fashion -->
        </div>
      </section>
      <!-- end of ours section -->

      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/about.php" ?>
      
     
      <!-- contact section -->
      <section class="contents contact hasTitle">
        <div class="center">
          <!-- about title -->
          <div class="title">
            <h2>Contact Us</h2>
            <div class="subTit">
              <span class="subLine"></span>
              <a href="#" class="subLink">View More Details</a>
            </div>
          </div>
          <!-- end of contact title -->

          <div class="contactBox">
            <div class="mapBox">
              <div class="map">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3165.9975987333805!2d127.0120296155672!3d37.484383036585974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca114196137d5%3A0xac3dea447afe04b8!2z7Iah66a867mM65Sp!5e0!3m2!1sko!2skr!4v1608271243006!5m2!1sko!2skr"
                >
                </iframe>
              </div>
            </div>
            <div class="formBox">
              <form action="abc.php" method="post" class="form" name="form">
                <p class="nameMail">
                  <input type="text" placeholder="Your Name" />
                  <input type="text" placeholder="Your Email" />
                </p>
                <p class="subject">
                  <input type="text" placeholder="Subject" />
                </p>
                <p class="message">
                  <textarea placeholder="Your Message"></textarea>
                </p>
                <p>
                  <a href="#">Send Message</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- end of contact section -->

      <?php include $_SERVER["DOCUMENT_ROOT"]. "/gold/include/footer.php" ?> 
    </div>  
    <!-- end of wrap -->


    <!-- jquery frame work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jquery easing cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- main jqeury link -->
    <script src="js/custom.js"></script>



    <script>
      $(function(){
        // click 'get in touch with', move scroll to contact in design detail page
        const loca=$(location).attr('href').split('#')[1];
        
        if(loca == 'contact'){
           // const contactOff=$(`.${loca}`).offset().top;

           const contactOff=$('.' + loca).offset().top;

           $("html,body").animate({scrollTop:contactOff},1000, 'easeInQuint');
    
        }
        

        // cutting txt on web text contents
        // cutting text each boxes
        let mainWebBox = $(".fashionImg");

        for (let i = 0; i < mainWebBox.length; i++) {
            let allTxt = mainWebBox.eq(i).find(".cutTxt").text();
        
            function cutTxt() {
                let winWidth = $(window).width();
                if (winWidth < 800) {
                    mainWebBox.eq(i).find(".cutTxt").text(allTxt.substr(0, 20) + '...');
        
                } else {
                    mainWebBox.eq(i).find(".cutTxt").text(allTxt.substr(0, 40) + '...');
        
                }
            }

           $(window).resize(function () {
               cutTxt()
       
           });
           cutTxt()

        }

      

      });
    </script>
  
  </body>
</html>