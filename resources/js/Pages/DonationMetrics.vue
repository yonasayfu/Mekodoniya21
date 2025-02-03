<template>
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-gray-900 mb-12">
          Community Support Overview
        </h1>
  
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
          <div v-for="(metric, key) in filteredMetrics" :key="key" 
               class="bg-white p-6 rounded-xl shadow-lg transform transition hover:scale-105">
            <div class="text-center">
              <p class="text-lg font-semibold text-gray-600 mb-2">
                {{ labels[key] }}
              </p>
              <div class="text-3xl font-bold text-blue-600">
                <autocounter
                  :startAmount="0"
                  :endAmount="metric"
                  :duration="2"
                  prefix="₹"
                  separator=","
                  decimalSeparator="."
                  :decimals="0"
                />
              </div>
            </div>
          </div>
        </div>
  
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-xl font-semibold mb-4">Recent Contributions</h2>
          <div class="space-y-4">
            <div v-for="donation in metrics.recent_donations" :key="donation.id"
                 class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center">
                    <span class="text-white font-bold">
                      {{ getInitials(donation.display_name) }}
                    </span>
                  </div>
                </div>
                <div>
                  <p class="font-medium text-gray-900">{{ donation.display_name }}</p>
                  <p class="text-sm text-gray-500">{{ formatDate(donation.date) }}</p>
                </div>
              </div>
              <span class="text-lg font-semibold text-blue-600">
                ₹{{ donation.amount.toLocaleString() }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import Autocounter from 'vue3-autocounter';
  import { computed } from 'vue';
  import { Head, Link } from '@inertiajs/vue3';
  
  const props = defineProps({
    metrics: Object
  });
  
  const labels = {
    current_month: 'This Month',
    current_quarter: 'This Quarter',
    half_year: 'Last 6 Months',
    all_time: 'All Time Support'
  };
  
  const filteredMetrics = computed(() => {
    const { recent_donations, ...rest } = props.metrics;
    return rest;
  });
  
  const getInitials = (name) => {
    return name.split(' ').map(n => n[0]).join('').toUpperCase();
  };
  
  const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString('en-IN', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
  };
  </script>