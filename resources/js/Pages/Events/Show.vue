<template>
    <div>
      <h1>Event Details</h1>
      <p>Name: {{ event.name }}</p>
      <p>Type: {{ event.type }}</p>
      <p>Date: {{ event.date }}</p>
      <p>Start Time: {{ event.start_time }}</p>
      <p>End Time: {{ event.end_time }}</p>
      <p>Location: {{ event.location }}</p>
      <p>Facility: {{ event.facility.name }}</p>
      <p>Staff: {{ event.staff.name }}</p>
      <p>Catering: {{ event.catering.name }}</p>
      <p>Custom Requirements: {{ event.custom_requirements }}</p>
      <Link :href="`/events/${event.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    event: Object,
  });
  </script>