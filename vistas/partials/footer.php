<!-- bloque de estilos responsivos -->
<style>
  @media (max-width: 768px) {
    footer > div {
      flex-direction: column !important;
      align-items: stretch !important;
    }
    footer > div > div {
      flex-direction: column !important;
      gap: 1rem !important;
      width: 100% !important;
      justify-content: center !important;
    }
    footer button {
      width: 100% !important;
      padding: 12px !important;
      font-size: 1rem !important;
    }
  }
</style>

<!-- codigo del footer -->
<footer style="background: white; padding: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-top: 2rem;">
  <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto;">
    <div style="display: flex; width: 100%; justify-content: space-between;">
      <button style="background: #1F7BB8; color: black; font-weight: bold; padding: 12px 40px; font-size: 1.1rem; border-radius: 9999px; border: none; cursor: pointer;">
        ANTERIOR
      </button>
      <button style="background: #1F7BB8; color: black; font-weight: bold; padding: 12px 40px; font-size: 1.1rem; border-radius: 9999px; border: none; cursor: pointer;">
        SIGUIENTE
      </button>
    </div>
  </div>
</footer>
