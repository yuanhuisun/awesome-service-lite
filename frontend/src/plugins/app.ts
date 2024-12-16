import { h } from 'vue';
import type { App } from 'vue';
// import { NButton } from 'naive-ui';
import { ElButton } from 'element-plus';
import { $t } from '@/locales';

export function setupAppErrorHandle(app: App) {
  app.config.errorHandler = (err, vm, info) => {
    // eslint-disable-next-line no-console
    console.error(err, vm, info);
  };
}

export function setupAppVersionNotification() {
  const canAutoUpdateApp = import.meta.env.VITE_AUTOMATICALLY_DETECT_UPDATE === 'Y';

  if (!canAutoUpdateApp) return;

  let isShow = false;

  document.addEventListener('visibilitychange', async () => {
    const preConditions = [!isShow, document.visibilityState === 'visible', !import.meta.env.DEV];

    if (!preConditions.every(Boolean)) return;

    const buildTime = await getHtmlBuildTime();

    if (buildTime === BUILD_TIME) {
      return;
    }

    isShow = true;

    const n = window.$notification!({
      title: $t('system.updateTitle'),
      message: h('div', {}, [
        h('p', {}, $t('system.updateContent')),
        h('div', { style: { display: 'flex', justifyContent: 'end', gap: '12px' } }, [
          h(
            ElButton,
            {
              onClick() {
                n?.close();
              }
            },
            () => $t('system.updateCancel')
          ),
          h(
            ElButton,
            {
              type: 'primary',
              onClick() {
                location.reload();
              }
            },
            () => $t('system.updateConfirm')
          )
        ])
      ])
    });
  });
}

async function getHtmlBuildTime() {
  const res = await fetch(`/index.html?time=${Date.now()}`);

  const html = await res.text();

  const match = html.match(/<meta name="buildTime" content="(.*)">/);

  const buildTime = match?.[1] || '';

  return buildTime;
}
