	<div id="footer">
		<div class="d-flex spacing-p-t-1 max-width spacing-p-b-1">
			<div class="d-half t-whole">
				<p class="s-small uppercase">Festival del <br/> Turismo Musicale</p>
				<p class="s-small uppercase">© <?php the_time('Y'); ?><br/><br/>

				<a class="s-small uppercase" href="mailto:info@wearebutik.com">Email</a><br/>
				<a class="s-small uppercase" href="https://www.instagram.com/tum_turismomusicale/" target="_blank">Instagram</a><br/>
				<a class="s-small uppercase" href="https://www.facebook.com/TUMturismomusicale" target="_blank">Facebook</a><br/>
				<a class="s-small uppercase" href="https://www.linkedin.com/showcase/tum-turismo-musicale/" target="_blank">Linkedin</a></p>
			</div>

			<div class="d-half t-whole">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
			</div>

		</div>
	</div>
	 
	</div>

<?php wp_footer(); ?>

</body>
</html>