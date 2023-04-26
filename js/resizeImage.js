const preview = document.querySelector('#preview');
const submit = document.querySelector('#submit');
const input = document.querySelector('input[type="file"]');


input.addEventListener('change', () => {
  const file = input.files[0];
  const reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = () => {
    const img = new Image();
    img.src = reader.result;
    preview.src = reader.result;
    preview.style.display = 'block';
    submit.style.display = "block";
    img.onload = () => {
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');
      const maxWidth = 800;
      const maxHeight = 600;
      let width = img.width;
      let height = img.height;
      if (width > maxWidth) {
        height *= maxWidth / width;
        width = maxWidth;
      }
      if (height > maxHeight) {
        width *= maxHeight / height;
        height = maxHeight;
      }
      canvas.width = width;
      canvas.height = height;
      ctx.drawImage(img, 0, 0, width, height);
      const dataURL = canvas.toDataURL('image/jpeg');
      document.querySelector('input[name="resized_image"]').value = dataURL;
    };
  };
});