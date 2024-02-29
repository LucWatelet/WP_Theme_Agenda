<div class="categories_heads grid-100 tablet-grid-100 grid-parent mobile-grid-100 clearfix">
	<h1>Choisir une catégorie: </h1>


	<?php
	//sort($categories_slugs);
	foreach ($categories_slugs as $category_slug) {
		$category = get_category_by_slug($category_slug);
		$current=($category_slug==$selected_cat?true:false); ?>
		<div class="bloc grid-33 tablet-grid-50 mobile-grid-100">
			<a href="?cat=<?php echo $category_slug; ?>#liste-cat">
				<span class='category_head<?php echo $current?' category_head_active':''; ?>'>
					<img src="<?php echo get_template_directory_uri(); ?>/img/categories-culture-sport/<?php echo $category_slug; ?>.svg" alt="icon"> <?php echo $category->name ;  ?>
				</span>
			</a>
		</div>

		<?php
	}
	
	?>
	<?php $id_page = get_the_ID(); ?>
	
	<?php if($id_page == 62119): ?>
	<div class="bloc grid-33 tablet-grid-50 mobile-grid-100">
		<a href="https://lampli.be/artistes/" target="_blank">
			<span class='category_head'>
				<img src="<?php echo get_template_directory_uri(); ?>/img/categories-culture-sport/groupes-de-musique-amplifiees.svg" alt="icon">www.lampli.be groupes musiques amplifiées
			</span>
		</a>
	</div>
	<?php endif; ?>
	
</div>

<div class="category_elements_list grid-100 tablet-grid-100 mobile-grid-100 grid-parent" id="liste-cat">
<?php
	if (isset($selected_cat)) {
		$query['post_type'] = 'hades_offre';
		$query['category_name'] = $selected_cat;
		$query['meta_query'] = array('localite_commune_clause' => array('key' => 'localite_commune'));
		$query['orderby'] = array('localite_commune_clause' => 'ASC');

		$posts_agenda = new WP_Query($query);
		if (!isset($selected_cat)) {
			$posts_agenda->set('posts_per_page', 30);
		} else {
			$posts_agenda->set('posts_per_page', 300);
		}
		$posts_agenda->get_posts();
		if ($posts_agenda->have_posts()) {
			?>
		<div class="grid-60 prefix-20 suffixe-20 tablet-grid-100 mobile-grid-100">
			<div class="liste-liens clearfix">
				 <form action="" method="get" target="blank" class="aligncenter tablet-aligncenter mobile-alignleft">
					<input type="submit" id="clickexcell" value='Télécharger la liste' />
					<input type="hidden" name="cat" value="<?php echo $_GET['cat']?>" />
					<input type="hidden" name="export" value="" />
				</form>
				<a href="#hades_map_search_map" class="voir-plus culture">Afficher la carte</a>
			</div>
		</div>
			<?php
			while ($posts_agenda->have_posts()) {
				include 'inc_other_list.php';
			}
		}
	} else { ?>
<!--		<h2 style="color:#ffffff;">Aucun résultat</h2>-->
<?php	}
?>
</div>

<div class="category_elements_map">
<?php
	if (isset($selected_cat)) {
		$cat_obj = get_category_by_slug($selected_cat);
		?>
<form id='hades_map_search_form'>
	<input type= 'hidden' name='category_name["<?php echo $cat_obj->cat_ID; ?>"]' value='<?php echo $cat_obj->slug; ?>' />
    <input type='hidden' name='action' value='get_map_hades' /> 
</form>
<div id='hades_map_search_map'></div>
<script>
	var hades_map = L.map('hades_map_search_map').setView([50, 5.4], 9);
	var hades_markers=[];
	var hades_map_marker = [];
	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar'}).addTo(hades_map);
	var hades_bounds = [];
	send_map_ajax();
</script>
	
<?php } ?>
</div>

