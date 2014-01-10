</div>

<footer class="clearfix simple">
    <div class="constrain">


        <div id="legal">
            <ul class="footer-site-links">
                <!-- <li><a class="icon-pencil" href="http://learn.jquery.com/">Learning Center</a></li> -->
                <li><a>Tapissier décorateur</a></li>
            </ul>

        </div>
    </div>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>
<?php foreach ($listeJS as $js) { ?>
    <script src="<?php echo SITE_FRONT . $js; ?>"></script>
<?php } ?>

<script>
    /* var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
     (function(d, t) {
     var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
     g.src = '//www.google-analytics.com/ga.js';
     s.parentNode.insertBefore(g, s)
     }(document, 'script'));**/
</script>
</body>
</html>
