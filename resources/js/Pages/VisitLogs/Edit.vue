<template>
    <div>
      <h1>Edit Visit Log</h1>
      <form @submit.prevent="submit">
        <select v-model="form.elder_id">
          <option v-for="elder in elders" :key="elder.id" :value="elder.id">{{ elder.name }}</option>
        </select>
        <select v-model="form.supporter_id">
          <option v-for="supporter in supporters" :key="supporter.id" :value="supporter.id">{{ supporter.name }}</option>
        </select>
        <input v-model="form.visit_date" type="date" />
        <textarea v-model="form.visit_purpose" placeholder="Visit Purpose"></textarea>
        <textarea v-model="form.notes" placeholder="Notes"></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    visitLog: Object,
    elders: Array,
    supporters: Array,
  });
  
  const form = useForm({
    elder_id: props.visitLog.elder_id,
    supporter_id: props.visitLog.supporter_id,
    visit_date: props.visitLog.visit_date,
    visit_purpose: props.visitLog.visit_purpose,
    notes: props.visitLog.notes,
  });
  
  const submit = () => {
    form.put(`/visit-logs/${props.visitLog.id}`);
  };
  </script>