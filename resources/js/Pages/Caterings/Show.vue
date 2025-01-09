<template>
    <div>
      <h1>Catering Details</h1>
      <p>Name: {{ catering.name }}</p>
      <p>Menu: {{ catering.menu }}</p>
      <p>Price: {{ catering.price }}</p>
      <Link :href="`/caterings/${catering.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    catering: Object,
  });
  </script>