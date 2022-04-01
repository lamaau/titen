// this contains with \App\Enums\Config\Storage
const Storages = Object.freeze({
  LOCAL: 1,
  AWSS3: 2,
  DROPBOX: 3,
  GOOGLE_DRIVE: 4,
});

const Status = Object.freeze({
  ENABLED: 1,
  DISABLED: 2,
});

export { Storages, Status };
