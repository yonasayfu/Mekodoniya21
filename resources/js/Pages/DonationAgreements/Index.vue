<template>
    <div>
      <h1>Donation Agreements</h1>
      <ul>
        <li v-for="agreement in donationAgreements" :key="agreement.id">
          {{ agreement.supporter.name }} - {{ agreement.monthly_donation_amount }}
          <Link :href="`/donation-agreements/${agreement.id}`">View</Link>
          <Link :href="`/donation-agreements/${agreement.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/donation-agreements/create">Create New Donation Agreement</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    donationAgreements: Array,
  });
  </script>