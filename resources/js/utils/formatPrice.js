export function formatPrice(value, currencyLabel = "", locale = "ro-RO") {
    const formatted = Number(value || 0).toLocaleString(locale);
    return `${formatted} ${currencyLabel}`.trim();
}
