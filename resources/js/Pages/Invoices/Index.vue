<template>
    <div>
      <h1>Invoices</h1>
      <ul>
        <li v-for="invoice in invoices" :key="invoice.id">
          {{ invoice.event.name }} - {{ invoice.amount }}
          <Link :href="`/invoices/${invoice.id}`">View</Link>
          <Link :href="`/invoices/${invoice.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/invoices/create">Create New Invoice</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    invoices: Array,
  });
  </script>