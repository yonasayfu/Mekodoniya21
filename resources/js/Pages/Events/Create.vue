<template>
    <div>
      <h1>Create Event</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <input v-model="form.type" placeholder="Type" />
        <input v-model="form.date" type="date" />
        <input v-model="form.start_time" type="time" />
        <input v-model="form.end_time" type="time" />
        <input v-model="form.location" placeholder="Location" />
        <select v-model="form.facility_id">
          <option v-for="facility in facilities" :key="facility.id" :value="facility.id">{{ facility.name }}</option>
        </select>
        <select v-model="form.staff_id">
          <option v-for="staff in staff" :key="staff.id" :value="staff.id">{{ staff.name }}</option>
        </select>
        <select v-model="form.catering_id">
          <option v-for="catering in caterings" :key="catering.id" :value="catering.id">{{ catering.name }}</option>
        </select>
        <textarea v-model="form.custom_requirements" placeholder="Custom Requirements"></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    facilities: Array,
    staff: Array,
    caterings: Array,
  });
  
  const form = useForm({
    name: '',
    type: '',
    date: '',
    start_time: '',
    end_time: '',
    location: '',
    facility_id: '',
    staff_id: '',
    catering_id: '',
    custom_requirements: '',
  });
  
  const submit = () => {
    form.post('/events');
  };
  </script>