<template>
  	<div class="container-fluid">
		  <!-- Tickets d'informations -->
		<div class="row mx-5 py-5">
			<div class="col-12 col-md-4 py-2 px-3 col-lg-4">
				<a href="/about" class="text-dark">
					<div data-aos="fade-up" class="bg-white shadow hvr-grow w-100 rounded-bzf border-info border-bottom mt-2">
						<div class="card-body pt-0 text-center">
							<i class="far fa-comment-alt rounded mt-n4 fa-3x text-center" style="background:white;"></i>

							<h4 class="card-title">À propos</h4>
							<p class="card-text">Tout à Propos de nos réalisations et pourquoi nous le faisons</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-12 col-md-4 py-2 px-3 col-lg-4">
				<a href="#Contact" class="text-dark">
					<div data-aos="fade-up" class="bg-white shadow hvr-grow w-100 rounded-bzf border-info border-bottom mt-2">
						<div class="card-body pt-0 text-center">
							<i class="fas fa-phone-square rounded mt-n4 fa-3x text-center" style="background:white;"></i>

							<h4 class="card-title">Contactez Nous</h4>
							<p class="card-text">Contactez nôtre équipe pour plus d'informations sur nos services</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-12 col-md-4 py-2 px-3 col-lg-4">
				<a v-on:click="Search" class="text-dark" style="cursor:pointer">
					<div data-aos="fade-up" class="bg-white shadow hvr-grow w-100 rounded-bzf border-info border-bottom mt-2">
						<div class="card-body pt-0 text-center">
							<i class="fas fa-images rounded mt-n4 fa-3x text-center" style="background:white;"></i>
							<h4 class="card-title">Une Large Gallerie</h4>
							<p class="card-text">Tout à Propos de nos réalisations et pourquoi nous le faisons</p>
						</div>
					</div>
				</a>
			</div>
			
		</div>
		<!-- Page Contact -->
		<div class="row align-items-center" id="Contact">
			<div class="col-md-7 col-12">
				<h2 class="text-center mt-5 h2">
					Conactez Nous
				</h2>
				<img src="/images/contact-us.svg" alt="" class="img-fluid">
			</div>
			<div class=" col-md-5 col-12 col-lg-5">
				<div data-aos="fade-up" class="card my-3">
					<div class="card-header">
						Contact
					</div>
					<div class="card-block">
						<form role="form">
							<div class="form-group col-md-6">
								<label class="form-control-label" for="form-group-input">Nom</label>
								<input type="text" class="form-control"  name="name">
							</div>
							<div class="form-group col-md-6">
								<label class="form-control-label" for="form-group-input">E-mail</label>
								<input type="text" class="form-control"  name="email">
							</div>
							<div class="form-group col-md-6">
								<label class="form-control-label" for="form-group-input">Raison</label>
								<select size="0" class="form-control" name="reason">
									<option>Questions</option>
									<option>Support</option>
								</select>
							</div>
							<div class="form-group col-lg-12">
								<label class="form-control-label" for="form-group-input">Notes</label>
								<textarea class="form-control"  name="notes" rows="6"></textarea>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
		<div class="row mt-5" id="About">
			<div class="col-md-7 bg-light col-lg-7 col-12">
				<div class="card">
				  <div class="card-body">
					<h4 class="card-title">Bienvenue à ASIC,</h4>
					<p class="card-text">
						Votre source numéro un pour tout ce qui concerne Imagerie Médicale. Nous nous engageons à vous offrir le meilleur de Imagerie Médicale, en mettant l'accent sur la fiabilité, le service clientèle et l'unicité.
						Fondé en 2020 par Khoucha Madani, ASIC a parcouru un long chemin depuis ses débuts dans l'université d'Alger 1 Lorsque Khoucha Madani a débuté, sa passion pour l'Imagerie Médicale l'a conduit à Entreprendre ce Projet, et lui a donné l'impulsion nécessaire pour transformer son travail acharné et son inspiration en ASIC. Nous servons maintenant des clients partout dans le monde entier, et nous sommes ravis de faire partie de l'aile de l'industrie de l'imagerie Médicale.

						Nous espérons que vous apprécierez nos images autant que nous avons plaisir à vous les offrir. Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter.

						Nous vous prions d'agréer, Madame, Monsieur, l'expression de nos sentiments les meilleurs,
						Khoucha Madani, PDG
					</p>
				  </div>
				</div>
			</div>
			<div class="col-md-5 col-lg-5 col-12">
				<img class="img-fluid rounded" src="/images/researcher-tools.jpg" alt="">
			</div>
		</div>
  	</div>
</template>

<script>
import AOS from 'aos';
export default {

	mounted(){
		AOS.init();
	},
	methods:{
		Search:function () {  
			document.getElementById('FilterButton').click();
		}
	}
}
</script>

<style scoped>
@import '~aos/dist/aos.css';
.rounded-bzf{
	border-radius: 0.5rem !important;
}
.border-bottom{
	border-width: 3px !important;
}
#Contact{
	background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)) 0% 0% / cover, url("/images/medical-blue-banner.jpg");
}
</style>