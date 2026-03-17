<?php

namespace Modules\Installer\Traits;

trait NetworkTrait 
{
    /**
     * List of recognized local IPs.
     *
     * @return array<string>
     */
    protected function knownLocalIps(): array
    {
        return [
            '127.0.0.1',
            '::1',
            '::ffff:127.0.0.1',
            '0.0.0.0',
            'localhost',
        ];
    }

    /**
     * Get the client's IP address from the request.
     */
    protected function clientIp(): string
    {
        return request()->server('REMOTE_ADDR', '0.0.0.0');
    }

    /**
     * Check if the given IP address is considered local.
     */
    protected function ipIsLocal(string $ip): bool
    {
        return in_array($ip, $this->knownLocalIps(), true);
    }

    /**
     * Check if the current request is from a local IP.
     */
    protected function requestFromLocalClient(): bool
    {
        return $this->ipIsLocal($this->clientIp());
    }
}
