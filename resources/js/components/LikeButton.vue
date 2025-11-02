<template>
  <button
    v-if="variant === 'icon'"
    class="btn-like-icon"
    :aria-pressed="toggled.toString()"
    @click="toggle"
    :title="toggled ? 'Saved to Favorites' : 'Add to Favorites'"
  >
    <span class="icon" v-html="icon"></span>
  </button>

  <button
    v-else
    class="btn-like"
    :aria-pressed="toggled.toString()"
    @click="toggle"
  >
    <span class="icon" v-html="icon"></span>
    <span class="label">{{ toggled ? 'Saved' : 'Add to Favorites' }}</span>
    <span class="count">{{ displayCount }}</span>
  </button>
</template>

<script setup>
import { computed, onMounted, ref, watch } from 'vue';

const props = defineProps({
  id: { type: String, required: true },
  initial: { type: Number, default: 0 },
  variant: { type: String, default: 'button' } // 'button' | 'icon'
});

const toggled = ref(false);

const keyToggle = (id) => `fav:${id}`;

const load = () => {
  toggled.value = localStorage.getItem(keyToggle(props.id)) === '1';
};

const save = () => {
  localStorage.setItem(keyToggle(props.id), toggled.value ? '1' : '0');
  window.dispatchEvent(new CustomEvent('fav-sync', { detail: { id: props.id } }));
};

const displayCount = computed(() => props.initial + (toggled.value ? 1 : 0));

const icon = computed(() =>
  toggled.value
    ? `<svg width="18" height="18" viewBox="0 0 24 24"><path d="M12 21s-6.7-4.2-9.5-7.5A6 6 0 0 1 12 5.6a6 6 0 0 1 9.5 7.9C18.7 16.8 12 21 12 21z"/></svg>`
    : `<svg width="18" height="18" viewBox="0 0 24 24"><path d="M12 21s-6.7-4.2-9.5-7.5A6 6 0 0 1 12 5.6a6 6 0 0 1 9.5 7.9C18.7 16.8 12 21 12 21z" fill="none" stroke="currentColor" stroke-width="1.8"/></svg>`
);

const toggle = () => {
  toggled.value = !toggled.value;
  save();
};

onMounted(() => {
  load();

  window.addEventListener('storage', (e) => {
    if (e.key === keyToggle(props.id)) load();
  });

  window.addEventListener('fav-sync', (e) => {
    if (e.detail && e.detail.id === props.id) load();
  });
});

watch(() => props.initial, () => {
  /* keep as-is; count is computed */
});
</script>

<style scoped>
.btn-like{display:inline-flex;align-items:center;gap:.5rem;border:1px solid rgba(0,0,0,.1);padding:.5rem .75rem;border-radius:.75rem;line-height:1;transition:transform .15s ease;background:#fff}
.btn-like:active{transform:scale(.98)}
.btn-like .icon{display:inline-flex}
.btn-like .label{font-size:.9rem}
.btn-like .count{font-weight:600;font-size:.9rem;margin-left:.25rem}

/* Compact circular icon for top-right overlay */
.btn-like-icon{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:999px;border:1px solid rgba(0,0,0,.08);background:#fff;box-shadow:0 4px 16px rgba(0,0,0,.12)}
.btn-like-icon:active{transform:scale(.96)}
.icon{display:inline-flex}
</style>
