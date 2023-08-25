<!-- BADGE -->
<div class="container" style="max-width: 680px" id="header-section">
	<div class="col-lg-12">
		<div class="mt-5">
			<img class="rounded-circle img-fluid mx-auto d-block" src="<?= base_url(); ?>assets/images/logo.jpg" alt="Profile Picture">
		</div>

		<div class="header-content text-center mx-auto">
			<h4 class="custom-text-color-primary header-text mb-2 mt-3">Esa Hadistra</h4>
		</div>
	</div>
	<div class="col-md-12">
		<div class="mb-4 text-center">
			<div>
				<ul class="about-social list-inline mt-4 text-center">
					<?php foreach ($badges as $badge) : ?>
						<li class="list-inline-item"><button type="button" onclick="clickCount('<?= $badge['url']; ?>', 1, '<?= $badge['key']; ?>')" target="_blank"><i class="mdi <?= $badge['icon']; ?>"></i></button></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="mt-3 pt-2">
		<hr class="hr-divider">
	</div>
</div>

<!-- PILLS -->
<div class="container" style="max-width: 680px" id="header-section">
	<?php foreach ($pills as $pill) : ?>
		<?php if ($pill['type'] == 'pills') : ?>
			<div class="mt-3 pt-2">
				<button type="button" onclick="clickCount('<?= $pill['url']; ?>', <?= $pill['external_link']; ?>, '<?= $pill['key']; ?>')" class="btn btn-round btn-custom bg-color-palette-2 w-100"><?= $pill['text']; ?> <i class="mdi <?= $pill['icon']; ?>"></i></button>
			</div>
		<?php else : ?>
			<div class="mt-3 pt-2">
				<hr class="hr-divider">
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php if (!$isRoot) : ?>
		<div class="mt-3 pt-2">
			<a href="<?= base_url(); ?>" class="btn btn-round btn-custom bg-color-palette-4 w-100">Back <i class="mdi mdi-keyboard-return"></i></a>
		</div>
	<?php endif; ?>
</div>