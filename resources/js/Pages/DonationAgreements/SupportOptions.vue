<template>
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4 text-center">Support Our Cause</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="bg-gradient-to-r from-blue-400 to-blue-600 rounded-lg shadow-lg p-6 text-center transition-transform hover:scale-110">
        <i class="fas fa-donate text-4xl text-white mb-4"></i>
        <h2 class="text-2xl font-semibold mb-2 text-white">Support by Money</h2>
        <p class="text-gray-200 mb-4">Make a monetary donation to support our mission.</p>
        <button @click="redirectToDonationForm" class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">
          Support by Bank Permanently
        </button> 
      </div>

      <div class="bg-gradient-to-r from-green-400 to-green-600 rounded-lg shadow-lg p-6 text-center transition-transform hover:scale-110">
        <i class="fas fa-hand-holding-heart text-4xl text-white mb-4"></i>
        <h2 class="text-2xl font-semibold mb-2 text-white">In-Kind Donations</h2>
        <p class="text-gray-200 mb-4">Donate goods or services.</p>
        <button @click="redirectToInKindForm" class="bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">
          Donate In-Kind
        </button>
      </div>

      <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-lg shadow-lg p-6 text-center transition-transform hover:scale-110">
        <i class="fas fa-hands-helping text-4xl text-white mb-4"></i>
        <h2 class="text-2xl font-semibold mb-2 text-white">Volunteering Time</h2>
        <p class="text-gray-200 mb-4">Offer your time and skills.</p>
        <button @click="redirectToVolunteeringForm" class="bg-gradient-to-r from-yellow-500 to-yellow-700 hover:from-yellow-600 hover:to-yellow-800 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">
          Volunteer
        </button>
      </div>

      <div class="bg-gradient-to-r from-red-400 to-red-600 rounded-lg shadow-lg p-6 text-center transition-transform hover:scale-110">
        <i class="fas fa-hand-holding-usd text-4xl text-white mb-4"></i>
        <h2 class="text-2xl font-semibold mb-2 text-white">Fundraising</h2>
        <p class="text-gray-200 mb-4">Create your own fundraising campaign.</p>
        <button @click="redirectToFundraising" class="bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">
          Start Fundraising
        </button>
      </div>
    </div>
    
    <footer class="mt-8 p-4 bg-gray-800 text-white text-center">
      <p>Follow us on social media</p>
      <div class="flex justify-center space-x-4">
        <a href="#" class="hover:text-gray-400"><i class="fab fa-facebook"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-twitter"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-instagram"></i></a>
      </div>
    </footer>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  methods: {
    redirectToDonationForm() {
      Inertia.visit(route('donation-agreements.create'));
    },
    redirectToInKindForm() {
      Inertia.visit(route('in-kind-donations.create')); // Replace with your actual route
    },
    redirectToVolunteeringForm() {
      Inertia.visit(route('volunteering.create')); // Replace with your actual route
    },
    redirectToFundraising() {
      Inertia.visit(route('fundraising.create')); // Replace with your actual route
    },
  },
};
</script>

<style scoped>
/* Any additional styles can go here */
</style>
