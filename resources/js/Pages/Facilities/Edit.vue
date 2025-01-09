<template>
    <div>
      <h1>Edit Facility</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <input v-model="form.location" placeholder="Location" />
        <input v-model="form.capacity" placeholder="Capacity" />
        <input v-model="form.availability" type="checkbox" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    facility: Object,
  });
  
  const form = useForm({
    name: props.facility.name,
    location: props.facility.location,
    capacity: props.facility.capacity,
    availability: props.facility.availability,
  });
  
  const submit = () => {
    form.put(`/facilities/${props.facility.id}`);
  };
  </script>