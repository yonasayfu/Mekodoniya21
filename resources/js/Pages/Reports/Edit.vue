<template>
    <div>
      <h1>Edit Report</h1>
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
  
  const props = defineProps({
    report: Object,
  });
  
  const form = useForm({
    report_type: props.report.report_type,
    data: props.report.data,
    generated_at: props.report.generated_at,
  });
  
  const submit = () => {
    form.put(`/reports/${props.report.id}`);
  };
  </script>