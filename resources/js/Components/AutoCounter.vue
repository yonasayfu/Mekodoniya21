<template>
  <span>{{ displayValue }}</span>
</template>

<script>
export default {
  props: {
    startAmount: {
      type: Number,
      required: true,
    },
    endAmount: {
      type: Number,
      required: true,
    },
    duration: {
      type: Number,
      default: 2,
    },
    prefix: {
      type: String,
      default: '',
    },
    separator: {
      type: String,
      default: ',',
    },
    decimalSeparator: {
      type: String,
      default: '.',
    },
    decimals: {
      type: Number,
      default: 0,
    },
  },
  data() {
    return {
      displayValue: this.formatNumber(this.startAmount),
    };
  },
  methods: {
    formatNumber(value) {
      return this.prefix + value.toFixed(this.decimals).replace(/\B(?=(\d{3})+(?!\d))/g, this.separator).replace('.', this.decimalSeparator);
    },
    animateValue() {
      const start = this.startAmount;
      const end = this.endAmount;
      const duration = this.duration * 1000;
      const range = end - start;
      const minTimer = 50;
      const stepTime = Math.max(Math.floor(duration / range), minTimer);
      let startTime = null;

      const step = (timestamp) => {
        if (!startTime) startTime = timestamp;
        const progress = timestamp - startTime;
        const current = Math.min(start + (progress / duration) * range, end);
        this.displayValue = this.formatNumber(current);
        if (current < end) {
          window.requestAnimationFrame(step);
        }
      };

      window.requestAnimationFrame(step);
    },
  },
  mounted() {
    this.animateValue();
  },
};
</script>