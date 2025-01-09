<template>
    <div>
      <h1>Donations</h1>
      <ul>
        <li v-for="donation in donations" :key="donation.id">
          {{ donation.supporter.name }} - {{ donation.amount }}
          <Link :href="`/donations/${donation.id}`">View</Link>
          <Link :href="`/donations/${donation.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/donations/create">Create New Donation</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    donations: Array,
  });
  </script>