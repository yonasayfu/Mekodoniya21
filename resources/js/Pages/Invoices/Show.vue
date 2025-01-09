<template>
    <div>
      <h1>Invoice Details</h1>
      <p>Event: {{ invoice.event.name }}</p>
      <p>Amount: {{ invoice.amount }}</p>
      <p>Date: {{ invoice.date }}</p>
      <p>Status: {{ invoice.status }}</p>
      <Link :href="`/invoices/${invoice.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    invoice: Object,
  });
  </script>