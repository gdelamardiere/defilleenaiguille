</div>

<footer class="clearfix simple">
    <ul class="footer-site-links">
        <!-- <li><a class="icon-pencil" href="http://learn.jquery.com/">Learning Center</a></li> -->
        <li><a href="<?php echo SITE_FRONT; ?>">Tapissier décorateur</a></li>
    </ul>
</div>
</footer>
<link href='http://fonts.googleapis.com/css?family=Convergence&v=<?php echo VERSION; ?>' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js?v=<?php echo VERSION; ?>"></script>

<script src="<?php echo SITE_FRONT; ?>js/vendor/bootstrap.min.js?v=<?php echo VERSION; ?>"></script>
<?php foreach ($listeJS as $js) { ?>
    <script src="<?php echo SITE_FRONT . $js; ?>?v=<?php echo VERSION; ?>"></script>
<?php } ?>

</body>
</html>
