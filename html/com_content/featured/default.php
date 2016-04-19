<?php
/**
 * @package		 Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license		 GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app  = JFactory::getApplication();
$doc  = JFactory::getDocument();
$path = JURI::base(true).'/templates/'.$app->getTemplate().'/';

$renderer = $doc->loadRenderer('modules');
$render_options = array('style' => 'none');
$params = $app->getTemplate(true)->params;

?>
		<section class="head">
			<h2><?php echo $params->get('sitedeschead'); ?></h2>
			<div class="item">
				<p><?php echo $params->get('sitedescbody'); ?></p>
			</div>
		</section>

		<section class="logo-map-sec backcolor">
			<div class="logo-map">
				<img class="shadow" src="<?php echo $path; ?>/media/metro-logo.svg" />

				<!--
				<a href=""><button class="nw backcolor-shine">MPS Energie Institut</button></a>
				<a href=""><button class="ne backcolor-shine">Verein</button></a>
				<a href=""><button class="sw backcolor-shine">Bildung</button></a>
				<a href=""><button class="se backcolor-shine">Mitglied werden</button></a>
				-->

				<div class="nw">
					<h3><?php echo $params->get('logomapheadnw'); ?></h3>
					<p><?php echo $params->get('logomapbodynw'); ?></p>
				</div>

				<div class="ne">
					<h3><?php echo $params->get('logomapheadne'); ?></h3>
					<p><?php echo $params->get('logomapbodyne'); ?></p>
				</div>

				<div class="sw">
					<h3><?php echo $params->get('logomapheadsw'); ?></h3>
					<p><?php echo $params->get('logomapbodysw'); ?></p>
				</div>

				<div class="se">
					<h3><?php echo $params->get('logomapheadse'); ?></h3>
					<p><?php echo $params->get('logomapbodyse'); ?></p>
				</div>
			</div>
		</section>

		<div class="cols">
		<section class="col-1 left">
			<?php echo $renderer->render('front-red-left', null, null); ?>
		</section>

		<section class="col-1 right">
			<?php echo $renderer->render('front-red-right', null, null); ?>
		</section>
		</div>

		<section class="blog">
			<h2>Blog</h2>
			<div class="blog-featured<?php echo $this->pageclass_sfx;?>" itemscope itemtype="http://schema.org/Blog">
			<?php $leadingcount = 0; ?>
			<?php if (!empty($this->lead_items)) : ?>
			<div class="items-leading clearfix">
				<?php foreach ($this->lead_items as &$item) : ?>
					<div class="item-leading leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> clearfix"
						itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
						<?php
							$this->item = &$item;
							echo $this->loadTemplate('item');
						?>
					</div>
					<?php
						$leadingcount++;
					?>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<?php
				$introcount = (count($this->intro_items));
				$counter = 0;
			?>
			<?php if (!empty($this->intro_items)) : ?>
				<?php foreach ($this->intro_items as $key => &$item) : ?>

					<?php
					$key = ($key - $leadingcount) + 1;
					$rowcount = (((int) $key - 1) % (int) $this->columns) + 1;
					$row = $counter / $this->columns;

					if ($rowcount == 1) : ?>

					<div class="items-row cols-<?php echo (int) $this->columns;?> <?php echo 'row-' . $row; ?> row-fluid">
					<?php endif; ?>
						<div class="item column-<?php echo $rowcount;?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> span<?php echo round((12 / $this->columns));?>"
							itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
						<?php
								$this->item = &$item;
								echo $this->loadTemplate('item');
						?>
						</div>
						<?php $counter++; ?>

						<?php if (($rowcount == $this->columns) or ($counter == $introcount)) : ?>

					</div>
					<?php endif; ?>

				<?php endforeach; ?>
			<?php endif; ?>

			</div>
		</section>

		<div class="cols">
		<section class="col-2 left">
			<?php echo $renderer->render('front-yellow-left', null, null); ?>
		</section>

		<section class="col-2 right">
			<?php echo $renderer->render('front-yellow-right', null, null); ?>
		</section>
		</div>

		<section class="last">
			<?php echo $renderer->render('front-blue', null, null); ?>
		</section>
