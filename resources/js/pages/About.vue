<template>
  <h1>關於</h1>
  <div>你好~ 我是 {{ name }}</div>
</template>

<script>
export default {
  props: {
    name: String,
  },
}
</script>
