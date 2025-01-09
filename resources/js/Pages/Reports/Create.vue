<template>
    <div>
      <h1>Create Report</h1>
      <form @submit.prevent="submit">
        <input v-model="form.report_type" placeholder="Report Type" />
        <textarea v-model="form.data" placeholder="Data (JSON)"></textarea>
        <input v-model="form.generated_at" type="datetime-local" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    report_type: '',
    data: '',
    generated_at: '',
  });
  
  const submit = () => {
    form.post('/reports');
  };
  </script>