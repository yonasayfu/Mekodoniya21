<template>
    <div>
      <h1>Photo Galleries</h1>
      <ul>
        <li v-for="photoGallery in photoGalleries" :key="photoGallery.id">
          {{ photoGallery.event.name }} - {{ photoGallery.description }}
          <Link :href="`/photo-galleries/${photoGallery.id}`">View</Link>
          <Link :href="`/photo-galleries/${photoGallery.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/photo-galleries/create">Create New Photo Gallery</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    photoGalleries: Array,
  });
  </script>