<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\Core\REST\Client;

use eZ\Publish\API\Repository\URLAliasService as APIURLAliasService;
use eZ\Publish\API\Repository\Values\Content\Location;
use eZ\Publish\Core\REST\Common\RequestParser;
use eZ\Publish\Core\REST\Common\Input\Dispatcher;
use eZ\Publish\Core\REST\Common\Output\Visitor;

/**
 * Implementation of the {@link \eZ\Publish\API\Repository\URLAliasService}
 * interface.
 *
 * @see \eZ\Publish\API\Repository\URLAliasService
 */
class URLAliasService implements APIURLAliasService, Sessionable
{
    /** @var \eZ\Publish\Core\REST\Client\HttpClient */
    private $client;

    /** @var \eZ\Publish\Core\REST\Common\Input\Dispatcher */
    private $inputDispatcher;

    /** @var \eZ\Publish\Core\REST\Common\Output\Visitor */
    private $outputVisitor;

    /** @var \eZ\Publish\Core\REST\Common\RequestParser */
    private $requestParser;

    /**
     * @param \eZ\Publish\Core\REST\Client\HttpClient $client
     * @param \eZ\Publish\Core\REST\Common\Input\Dispatcher $inputDispatcher
     * @param \eZ\Publish\Core\REST\Common\Output\Visitor $outputVisitor
     * @param \eZ\Publish\Core\REST\Common\RequestParser $requestParser
     */
    public function __construct(HttpClient $client, Dispatcher $inputDispatcher, Visitor $outputVisitor, RequestParser $requestParser)
    {
        $this->client = $client;
        $this->inputDispatcher = $inputDispatcher;
        $this->outputVisitor = $outputVisitor;
        $this->requestParser = $requestParser;
    }

    /**
     * Set session ID.
     *
     * Only for testing
     *
     * @param mixed $id
     *
     * @private
     */
    public function setSession($id)
    {
        if ($this->outputVisitor instanceof Sessionable) {
            $this->outputVisitor->setSession($id);
        }
    }

    /**
     * Create a user chosen $alias pointing to $location in $languageCode.
     *
     * This method runs URL filters and transformers before storing them.
     * Hence the path returned in the URLAlias Value may differ from the given.
     * $alwaysAvailable makes the alias available in all languages.
     *
     * @param \eZ\Publish\API\Repository\Values\Content\Location $location
     * @param string $path
     * @param string $languageCode the languageCode for which this alias is valid
     * @param bool $forwarding if true a redirect is performed
     * @param bool $alwaysAvailable
     *
     * @throws \Exception
     */
    public function createUrlAlias(Location $location, $path, $languageCode, $forwarding = false, $alwaysAvailable = false)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * Create a user chosen $alias pointing to a resource in $languageCode.
     *
     * This method does not handle location resources - if a user enters a location target
     * the createCustomUrlAlias method has to be used.
     * This method runs URL filters and and transformers before storing them.
     * Hence the path returned in the URLAlias Value may differ from the given.
     *
     * $alwaysAvailable makes the alias available in all languages.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if the path already exists for the given
     *         language or if resource is not valid
     *
     * @param string $resource
     * @param string $path
     * @param string $languageCode
     * @param bool $forwarding
     * @param bool $alwaysAvailable
     *
     * @return \eZ\Publish\API\Repository\Values\Content\URLAlias
     */
    public function createGlobalUrlAlias($resource, $path, $languageCode, $forwarding = false, $alwaysAvailable = false)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * List of url aliases pointing to $location, sorted by language priority.
     *
     * @param \eZ\Publish\API\Repository\Values\Content\Location $location
     * @param bool $custom if true the user generated aliases are listed otherwise the autogenerated
     * @param string $languageCode filters those which are valid for the given language
     *
     * @return \eZ\Publish\API\Repository\Values\Content\URLAlias[]
     */
    public function listLocationAliases(Location $location, $custom = true, $languageCode = null)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * List global aliases.
     *
     * @param string $languageCode filters those which are valid for the given language
     * @param int $offset
     * @param int $limit
     *
     * @return \eZ\Publish\API\Repository\Values\Content\URLAlias[]
     */
    public function listGlobalAliases($languageCode = null, $offset = 0, $limit = -1)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * Removes urls aliases.
     *
     * This method does not remove autogenerated aliases for locations.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if alias list contains
     *         autogenerated alias
     *
     * @param \eZ\Publish\API\Repository\Values\Content\URLAlias[] $aliasList
     */
    public function removeAliases(array $aliasList)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * looks up the URLAlias for the given url.
     *
     * @param string $url
     * @param string $languageCode
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException if the path does not exist or is not valid for the given language
     *
     * @return \eZ\Publish\API\Repository\Values\Content\URLAlias
     */
    public function lookup($url, $languageCode = null)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * Returns the URL alias for the given location in the given language.
     *
     * If $languageCode is null the method returns the url alias in the most prioritized language.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException if no url alias exist for the given language
     *
     * @param \eZ\Publish\API\Repository\Values\Content\Location $location
     * @param string $languageCode
     *
     * @return \eZ\Publish\API\Repository\Values\Content\URLAlias
     */
    public function reverseLookup(Location $location, $languageCode = null)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * Loads URL alias by given $id.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException
     *
     * @param string $id
     *
     * @return \eZ\Publish\API\Repository\Values\Content\URLAlias
     */
    public function load($id)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * Refresh all system URL aliases for the given Location (and historize outdated if needed).
     *
     * @param \eZ\Publish\API\Repository\Values\Content\Location $location
     *
     * @throws \Exception
     */
    public function refreshSystemUrlAliasesForLocation(Location $location): void
    {
        throw new \Exception('@todo: Implement');
    }

    /**
     * Delete global, system or custom URL alias pointing to non-existent Locations.
     */
    public function deleteCorruptedUrlAliases(): int
    {
        throw new \Exception('@todo: Implement');
    }
}
