<template>
    <div>
      <h1>Events</h1>
      <ul>
        <li v-for="event in events" :key="event.id">
          {{ event.name }} - {{ event.date }}
          <Link :href="`/events/${event.id}`">View</Link>
          <Link :href="`/events/${event.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/events/create">Create New Event</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    events: Array,
  });
  </script>