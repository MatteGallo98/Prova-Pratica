<template>
  <div>
    <Navbar></Navbar>
    <slot  />
  </div>
</template>

<script>
import Navbar from './shared/navbar'
export default {
    name: 'layout',
    components: {
        Navbar
    }
}
</script>