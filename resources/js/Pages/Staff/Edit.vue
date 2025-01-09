<template>
    <div>
      <h1>Edit Staff</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <input v-model="form.role" placeholder="Role" />
        <textarea v-model="form.schedule" placeholder="Schedule"></textarea>
        <input v-model="form.contact_information" placeholder="Contact Information" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    staff: Object,
  });
  
  const form = useForm({
    name: props.staff.name,
    role: props.staff.role,
    schedule: props.staff.schedule,
    contact_information: props.staff.contact_information,
  });
  
  const submit = () => {
    form.put(`/staff/${props.staff.id}`);
  };
  </script>