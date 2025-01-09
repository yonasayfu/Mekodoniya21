<template>
    <div>
      <h1>Photo Gallery Details</h1>
      <p>Event: {{ photoGallery.event.name }}</p>
      <p>Photo URL: {{ photoGallery.photo_url }}</p>
      <p>Description: {{ photoGallery.description }}</p>
      <Link :href="`/photo-galleries/${photoGallery.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    photoGallery: Object,
  });
  </script>