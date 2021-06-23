<?= $this->extend($config->viewLayout) ?>
<?= $this->section('content') ?>
<section class="text-gray-400 bg-gray-900 body-font">
	<div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
		<div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
			<h1 class="title-font font-medium text-3xl text-white">Bimbingan Belajar ASIQ!</h1>
			<p class="leading-relaxed mt-4">Silakan login terlebih dahulu.</p>
		</div>
		<div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
			<h2 class="text-white text-lg font-medium title-font mb-3"><?= lang('Auth.loginTitle') ?></h2>
			<?php if (session()->has('error')) : ?>
				<div class="text-xs text-center font-bold text-white p-1 rounded-lg mb-2 bg-red-600">
					<?= session('error') ?>
				</div>
			<?php endif ?>
			<form action="<?= route_to('login') ?>" method="post">
				<?php if ($config->validFields === ['email']) : ?>
					<div class="relative mb-4">
						<label for="email" class="leading-7 text-sm text-gray-400"><?= lang('Auth.email') ?></label>
						<input type="email" id="email" name="login" autocomplete="false" placeholder="<?= lang('Auth.email') ?>" class="<?php if (session('errors.login')) : ?>border-red-500<?php endif ?> w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-indigo-900 rounded border border-gray-600 focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
						<div class="text-sm font-bold text-red-500 mt-1">
							<?= session('errors.login') ?>
						</div>
					</div>

				<?php else : ?>
					<div class="relative mb-4">
						<label for="login" class="leading-7 text-sm text-gray-400"><?= lang('Auth.emailOrUsername') ?></label>
						<input type="text" id="login" name="login" autocomplete="false" placeholder="<?= lang('Auth.emailOrUsername') ?>" class="<?php if (session('errors.login')) : ?>border-red-500<?php endif ?> w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-indigo-900 rounded border border-gray-600 focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
						<div class="text-sm font-bold text-red-500 mt-1">
							<?= session('errors.login') ?>
						</div>
					</div>
				<?php endif; ?>

				<div class="relative mb-4">
					<label for="password" class="leading-7 text-sm text-gray-400"><?= lang('Auth.password') ?></label>
					<input type="password" name="password" autocomplete="false" placeholder="<?= lang('Auth.password') ?>" class="<?php if (session('errors.password')) : ?>border-red-500<?php endif ?> w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-indigo-900 rounded border border-gray-600 focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
					<div class="text-sm font-bold text-red-500 mt-1">
						<?= session('errors.password') ?>
					</div>
				</div>

				<?php if ($config->allowRemembering) : ?>
					<div class="relative mb-4">
						<label class="leading-7 text-sm text-gray-400">
							<input type="checkbox" name="remember" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-indigo-900 rounded border border-gray-600 focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" <?php if (old('remember')) : ?> checked <?php endif ?>>
							<?= lang('Auth.rememberMe') ?>
						</label>
					</div>
				<?php endif; ?>
				<button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><?= lang('Auth.loginAction') ?></button>
			</form>
			<?php if ($config->allowRegistration) : ?>
				<p class="mt-3"><a class="text-xs" href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
			<?php endif; ?>
			<?php if ($config->activeResetter) : ?>
				<p><a class="text-xs" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
			<?php endif; ?>

		</div>
	</div>
</section>
<?= $this->endSection() ?>