/** Вывод категорий товаров **/
<ul class="category-card">
    <?php
  
    $args = [
        "taxonomy" => "product_cat",
        'parent' => 0,
		    'hide_empty' => false
    ];
    $product_cat = get_terms($args);

    foreach ($product_cat as $parent_product_cat) {
        $thumbnail_id = get_term_meta($parent_product_cat->term_id, "thumbnail_id", true);
        $cat_name = $parent_product_cat->name;
		$term_id = $parent_product_cat->term_id;
        ?>
        <li class="card__list">
            <a href="<?php echo get_term_link($parent_product_cat) ?>" class="card__link">
                <img class="img" alt="<?php the_title(); ?>" src="<?php echo wp_get_attachment_url($thumbnail_id); ?>">
                   <h2 class="card__title"><?php echo $cat_name; ?></h2>            
            </a>
        </li>
    <?php } ?>
</ul>

<style>
    .category-card {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
		padding: 0;
		margin: 0;
    }

    .card__list {
        display: flex;
		border:2px solid transparent;
		background-color: #0000001c;
		margin: 0 !important;
		padding: 0;
		transition: border .2s ease-in-out;
    }
	
	.card__list:hover {
		border:2px solid #334da8;
	} 
	.card__list:hover .card__title{
		color:#334da8;
	}

    .card__list:nth-child(4n+1) {        
        grid-column: 1/ span 2;
    }

    .card__list:nth-child(4n) {
        grid-column: 2/ span 2;
    }

    .card__link {
		width: 100%;
		display:flex;
		flex-direction:column;
    }
	.card__link:hover {
		text-decoration:none!important;;
	}

    .img {
      display: block;
      width: 100%;
  		max-height:300px;
      cursor: pointer;
      object-fit: contain;
      object-position: center;
  		margin: auto 0;
    }

    .card__title {
		font-size: 1.5em !important;
    margin: 0 !important;
    padding: 5px 20px !important;
    transition: color .2s ease-in-out;
    display: inline-block;
    max-width: 580px;
    background: rgb(255 255 255 / 50%);
    position: relative;
    }
	.card__title:after {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    background: #334da8;
}
	
 	@media (max-width: 1024px){
		.category-card {
			gap:15px;
			grid-template-columns: repeat(2, 1fr);
		}
		
		.card__list:nth-child(4n) {
        	grid-column: 1/ span 2;
    	}
	}
	
	@media (max-width: 768px){
		.card__list:nth-child(n){
			grid-column:auto;
		}
		.card__title {
			font-size: 1em !important;
    		padding: 5px 5px !important;
		}		
	}
</style> 




