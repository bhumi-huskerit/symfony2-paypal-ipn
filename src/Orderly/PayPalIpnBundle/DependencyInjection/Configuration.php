<?php

namespace Orderly\PayPalIpnBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/*
 * Copyright 2012 Orderly Ltd 
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 *  Setting config validators 
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
            $treeBuilder->root('orderly_pay_pal_ipn', 'array')
                ->children()
                    ->booleanNode('islive')->defaultValue(true)->end()
                    ->scalarNode('email')->isRequired()->cannotBeEmpty()->end()
                    ->scalarNode('url')->defaultValue('https://www.paypal.com/cgi-bin/webscr')->end()
                    ->booleanNode('debug')->defaultValue('%kernel.debug%')->end()
                    ->scalarNode('sandbox_email')->isRequired()->cannotBeEmpty()->end()
                    ->scalarNode('sandbox_url')->defaultValue('https://www.sandbox.paypal.com/cgi-bin/webscr')->end()
                    ->booleanNode('sandbox_debug')->defaultValue(true)->end()
                ->end()
            ->end()
            ->buildTree();
        return $treeBuilder;
    }
}
