<template>
    <div>
      <h1>Donation Details</h1>
      <p>Supporter: {{ donation.supporter.name }}</p>
      <p>Amount: {{ donation.amount }}</p>
      <p>Date: {{ donation.date }}</p>
      <p>Payment Method: {{ donation.payment_method }}</p>
      <p>Donation Type: {{ donation.donation_type }}</p>
      <Link :href="`/donations/${donation.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    donation: Object,
  });
  </script>