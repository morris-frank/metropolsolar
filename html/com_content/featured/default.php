<?php
/**
 * @package		 Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license		 GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space

$app             = JFactory::getApplication();
$path   = JURI::base(true).'/templates/'.$app->getTemplate().'/';

?>

		<section class="head">
			<h2>Wir bündeln Akteure</h2>
			<div class="item">
				<p>Das 2006 gegründete Netzwerk MetropolSolar Rhein-Neckar fördert die vollständige Ablösung der atomarfossilen Energieversorgung durch Energieeffizienz, Energieeinsparung und den Ausbau der Nutzung aller erneuerbaren Energien.</p>
			</div>
		</section>

		<section class="logo-map-sec backcolor">
			<div class="logo-map">
				<img class="shadow" src="<?php echo $path; ?>/media/metro-logo.svg" />
				<a href=""><button class="nw backcolor-shine">MPS Energie Institut</button></a>
				<a href=""><button class="ne backcolor-shine">Verein</button></a>
				<a href=""><button class="sw backcolor-shine">Bildung</button></a>
				<a href=""><button class="se backcolor-shine">Mitglied werden</button></a>
			</div>
		</section>

		<div class="cols">
		<section class="col-1 left">
			<h2>YouTube</h2>
			<div class="item">
				<p>
					<iframe src="https://www.youtube.com/embed/k287_MVfPMI" frameborder="0" allowfullscreen></iframe>
				</p>
			</div>
		</section>

		<section class="col-1 right">
			<h2>Twitter</h2>
			<div class="item">
				<p><a class="twitter-timeline"
						data-widget-id="600720083413962752"
						href="https://twitter.com/MetropolSolarRN"
						data-chrome="nofooter noborders noheaders transparent noscrollbar"
						data-link-color="#fff"
						data-theme="dark"
						height="300">
						Tweets by @MetropolSolar
					</a>
				</p>
			</div>
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
			<h2>Institut</h2>
			<div class="item">
				<p>MetropolSolar wurde als gemeinnütziger Verein gegründet, um eine Vollversorgung mit erneuerbaren Energien voranzutreiben. Neben internen Vernetzungsaktivitäten, fachlichem Austausch, Aufbau von Umsetzungsstrukturen, Organisation von Veranstaltungen und Öffentlichkeitsarbeit, spielt die Beratung nach außen eine immer größere Rolle.

Um diesem Bedarf gerecht zu werden, haben wir das MPS Energie Institut unter dem Dach von MetropolSolar Rhein-Neckar eingerichtet (hier anklicken).

Wenn Sie wissen wollen, ob und wie wir Sie bei der Entwicklung Ihrer Ideen und konkreten Projekte zu Energieeffizienz, Energieeinsparung und zur Umstellung auf erneuerbare Energien unterstützen können, setzen Sie sich am Besten direkt mit uns in Verbindung.

</p>
			</div>
		</section>

		<section class="col-2 right">
			<h2>Verein</h2>
			<div class="item">
				<p>Das 2006 gegründete Netzwerk MetropolSolar Rhein-Neckar fördert die vollständige Ablösung der atomarfossilen Energieversorgung durch Energieeffizienz, Energieeinsparung und den Ausbau der Nutzung aller erneuerbaren Energien.</p>
			</div>
		</section>
		</div>

		<section class="last">
			<h2>Verein</h2>
			<div class="item">
				<p></p>
			</div>
		</section>
